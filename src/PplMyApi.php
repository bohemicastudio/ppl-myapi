<?php

namespace BohemicaStudio\PplMyApi;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;
use Psr\Http\Message\ResponseInterface;

class PplMyApi
{
    private const TOKEN_CACHE_KEY = 'ppl-myapi-access-token';

    /** seconds that will be subtracted from the token's expiration time to save in the cache */
    private const TOKEN_CACHE_TTL_OFFSET = 10;

    private readonly GenericProvider $provider;

    private ?AccessTokenInterface $token = null;

    public function __construct(
    ) {
        $this->provider = new GenericProvider([
            'clientId' => Config::get('ppl-myapi.client_id'),
            'clientSecret' => Config::get('ppl-myapi.client_secret'),
            'urlAccessToken' => Config::get('ppl-myapi.access_token_url'),
            'redirectUri' => 'NOT_NECESSARY',
            'urlAuthorize' => 'NOT_NECESSARY',
            'urlResourceOwnerDetails' => 'NOT_NECESSARY',
        ]);
    }

    /**
     * @param  array<string,mixed>  $data
     */
    public function request(string $path, string $method = 'GET', array $data = []): ResponseInterface
    {
        $options = [];
        $url = $this->buildUrl($path);

        if (count($data) > 0) {
            if (strtoupper($method) === 'GET') {
                // For GET requests, add data as query parameters
                $url .= '?'.http_build_query($data);
            } else {
                // For non-GET requests, add data in the body
                $options = [
                    'headers' => [
                        'content-type' => 'application/json-patch+json',
                    ],
                    'body' => json_encode($data),
                ];
            }
        }

        $request = $this->provider->getAuthenticatedRequest(
            $method,
            $url,
            $this->token ?? $this->obtainAccessToken(),
            $options,
        );

        return $this->provider->getResponse($request);
    }

    private function obtainAccessToken(): AccessTokenInterface
    {
        $token = null;
        /** @var array<mixed>|null $cachedToken */
        $cachedToken = Cache::get(self::TOKEN_CACHE_KEY);
        if ($cachedToken !== null) {
            $token = new AccessToken($cachedToken);
        }

        if ($token === null || $token->hasExpired()) {
            $token = $this->provider->getAccessToken('client_credentials');

            Cache::set(
                self::TOKEN_CACHE_KEY,
                $token->jsonSerialize(),
                $token->getExpires() - time() - self::TOKEN_CACHE_TTL_OFFSET,
            );
        }

        $this->token = $token;

        return $this->token;
    }

    private function buildUrl(string $path): string
    {
        /** @var non-empty-string $url */
        $url = Config::get('ppl-myapi.base_url');

        return rtrim($url, '/').'/'.ltrim(str_replace($url, '', $path), '/');
    }
}
