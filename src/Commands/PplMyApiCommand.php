<?php

namespace BohemicaStudio\PplMyApi\Commands;

use Illuminate\Console\Command;

class PplMyApiCommand extends Command
{
    public $signature = 'ppl-myapi';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
