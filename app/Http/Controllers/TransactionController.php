<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->with('user:id,name,image,id_card')->paginate();
        $running_balance = Transaction::orderBy('id', 'desc')->select('balance')->first();

        $last_month_income = Transaction::where('income', '=', 1)
        ->whereMonth('created_at', '=', date('m', strtotime('last month')))
        ->whereYear('created_at', '=', date('Y', strtotime('last year')))
        ->sum('amount');

        $this_month_income = Transaction::where('income', '=', 1)
        ->whereMonth('created_at', '=', date('m'))
        ->whereYear('created_at', '=', date('Y'))
        ->sum('amount');

        $last_month_expense = Transaction::where('income', '=', 0)
        ->whereMonth('created_at', '=', date('m', strtotime('last month')))
        ->whereYear('created_at', '=', date('Y', strtotime('last year')))
        ->sum('amount');

        $this_month_expense = Transaction::where('income', '=', 0)
        ->whereMonth('created_at', '=', date('m'))
        ->whereYear('created_at', '=', date('Y'))
        ->sum('amount');
        
        $percentage_income = (($this_month_income - $last_month_income) / $last_month_income) * 100;
        $percentage_expense = (($this_month_expense - $last_month_expense) / $last_month_expense) * 100;
        $percentage_profit = (($running_balance->balance - ($last_month_income - $last_month_expense)) / $running_balance->balance) * 100;

        return view('transactions.index')->with([
            'transactions' => $transactions,
            'running_balance' => $running_balance->balance,
            'last_month_income' => $last_month_income,
            'this_month_income' => $this_month_income,
            'last_month_expense' => $last_month_expense,
            'this_month_expense' => $this_month_expense,
            'percentage_income' => $percentage_income,
            'percentage_expense' => $percentage_expense,
            'percentage_profit' => $percentage_profit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
