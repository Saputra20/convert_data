<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TransaksiController;

class TransactionSep extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:transactionsSep';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'php route:transactionsSep';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $transactions = new TransaksiController();

        print_r($transactions->sep());
    }
}
