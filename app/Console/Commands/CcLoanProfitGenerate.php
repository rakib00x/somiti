<?php

namespace App\Console\Commands;

use App\Models\Accounts\CcLoan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CcLoanProfitGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cc_loan:profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will generate monthly profit of cc loan';

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
        $current_date = Carbon::now()->format('Y-m-d');

        $cc_loans = CcLoan::where('status', 2)->where('type', 2)->get();
        foreach($cc_loans as $cc_loan){
            $profit_update_date = Carbon::parse($cc_loan->profit_updated_at);


            $months = $profit_update_date->diffInMonths($current_date);
            
            if($months > 0 ){
                $cc_loan->update([
                    'profit_amount' => ($cc_loan->loan_amount*$cc_loan->profit_rate)/100,
                    'installment_amount' => ($cc_loan->loan_amount*$cc_loan->profit_rate)/100,
                    'total_profit_generated' => $cc_loan->total_profit_generated + (($cc_loan->loan_amount*$cc_loan->profit_rate)/100),
                    'profit_updated_at' => today()
                ]);
            }
            
        }
      
    }
}
