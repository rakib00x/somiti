<?php

namespace App\Http\Traits;

use App\Models\SmsHistory;
use Exception;

trait MobileSmsTrait
{
    public function testsms($name)
    {
        return $name['name'];
    }

    public function newMemberSms($message, $data) //new member create
    {
       $msg = date('j F Y', strtotime($data['date'])) . 
            '.'.$message . 
            $data['account'] . '. [Target Amount:' . 
            $data['target_amount'] . '].'.'."Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1 && $data['mobile']) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $data['mobile']),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($data['mobile'], $msg, $data['account'], env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }
    
        public function newGaDepositeSms($phone, $account, $deposit, $date, $total) // general account deposite sms
    {
        $msg = date('j F Y', strtotime($date)) . 
        '. You have deposited your Account. Account Number:' . $account . '.  Deposit Amount:' . $deposit . 'tk. Total Balance:' . $total . '"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1 && $phone) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $phone),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($phone, $msg, $account, env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }

    public function newSavingsSms($data) // new dps account sms
    {
        $msg = date('j F Y', strtotime($data['date'])) . 
        '. Congratulations! Your DPS account has been Opening Successfully. Account Number:' . $data['account'] . '. Amount:' . $data['amount'] . 'tk. DPS Scheme:' . $data['scheme'] . '. Target Amount:' . $data['amount'] . 'tk. Number of Installment' . $data['installment'] . '. Deposit Amount:' . $data['deposit_amount'] . 'tk. Account Balance:' . $data['account_balance'] . 'tk.'.'"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $data['mobile']),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($data['mobile'], $msg, $data['account'], env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }

    public function newFdrSms($data) // fdr account create
    {
        $msg = date('j F Y', strtotime($data['date'])) .  
        '. Congratulations! Your FDR account has been Opening Successfully.  Account Number:' . $data['account'] . 'Duration Of the Month:' . $data['month'] . 'FDR Amount:' . $data['amount'].'"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $data['mobile']),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($data['mobile'], $msg, $data['account'], env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }

    public function fdrProfitDistribution($data) // auto monthly or yearly fdr profit distribution sms
    {
        return $data; // ongoing
    }

    public function createOrUpdateStaffSms($data)
    {
        $msg = date('j F Y', strtotime($data['date'])) . 
        '. Congratulations! You have been assigned to Blue Star Ltd.' . '. ID Number:' . $data['id'] . '. Joining Date:' . $data['joining_date'] . '. Branch:' . $data['branch'] . '. Area:' . $data['area'] . '. Name:' . $data['name'] . '. Designation:' . $data['designation'] . '. Salary:' . $data['salary'] . 'tk. Username:' . $data['username'] . '. [Password:' . $data['password'] . '].' . '"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1 && $data['mobile']) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $data['mobile']),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($data['mobile'], $msg, null, env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }

    public function newGaWithdrawSms($phone, $account, $withdraw, $date, $total) // general account withdraw sms
    {
        $msg = date('j F Y', strtotime($date)) . 
        '. You have withdrawn from the Account. Account Number:' . $account . '.  Withdrawal Amount:' . $withdraw . 'tk. Total Balance:' . $total . 'tk.' . '"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1 && $phone) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $phone),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($phone, $msg, $account, env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }

    public function newLoanSms($phone, $account, $amount, $scheme, $installment_amount, $installment)
    {
        $msg = 'Congratulations! Loan has been created successfully Amount:' . $amount . '. Account Number:' . $account . '. Scheme:' . $scheme . '. Installment Amount:' . $installment_amount . '. Installment:' . $installment . '"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $phone),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($phone, $msg, $account, env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }
    public function newLoanPaySms($phone, $account, $amount,  $date, $total, $due)
    {
        $msg = date('j F Y', strtotime($date)) . 
        '. Your installment has been paid. Account Number:' . $account . '. Installment:' . $amount . '. Total Collection:' . $total . 'tk. A/C Payable:' . $due . 'tk.' . '"Blue-Star Ltd"';
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $phone),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($phone, $msg, $account, env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }

    public function singleMobileSms($phone, $msg)
    {
        try {
            if (env('SMS_API_KEY') && env('SMS_API_STATUS') == 1) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('SMS_API_URL'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('api_key' => env('SMS_API_KEY'), 'msg' => $msg, 'to' => $phone),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $this->smsHistoryCreate($phone, $msg, null, env('SMS_API_URL'), env('SMS_API_KEY'));
            }
        } catch (Exception $e) {
        }
    }




    // sms history create 
    public function smsHistoryCreate($phone = null, $msg = null, $account = null, $url = null, $key = null)
    {
        SmsHistory::create([
            'api_url' => $url,
            'api_key' => $key,
            'message' => $msg,
            'mobile' => $phone,
            'account_number' => $account,
        ]);
    }
}
