@extends('expert.layout.layout')


@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/expert/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Payout</h1>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if(Session::has('withdraw_success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('withdraw_success')}}
            </div>
        @endif
        @if(Session::has('error_message'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('error_message')}}
            </div>
        @endif
    </div>
</div>

<div class="container-fluid page__container mt-4">
    <div class="row card-group-row">
        
        <div class="col-lg-6 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="flex">
                        <div class="card-header__title mb-2">Current Balance</div>
                        <div class="text-amount">@money($Expertdetail['balance'])</div>
                    </div>
                    
                </div>
                <div class="card-body flex-0">
                    <h4>Withdraw Funds</h4>
                    <form action="{{ url('/expert/payout')}}" method="post">@CSrf
                        <div class="form-group">
                            <label for="exampleInputEmail1 text-dark">Amount</label>
                            <input type="number"
                                    name="amount"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter Amount"  value="{{ old('amount') }}" required/>
                            @error('amount')
                            <span class="text-danger text-left">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="select05">Payment Method</label>
                            <select id="select05"
                                    name="payment_method"
                                    data-toggle="select"
                                    class="form-control" required>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Cashapp">Cashapp</option>
                                    <option value="Bank">Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBrief1">Payment Details</label>
                            <textarea class="form-control" id="exampleInputBrief1" name="payment_details" id="" cols="30" rows="10" required>{{ old('payment_details') }}</textarea>
                            @error('payment_details')
                            <span class="text-danger text-left">{{ $message }}</span>
                            @enderror
                        </div>
                        
                       
                        <button type="submit"
                                class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="flex">
                        <div class="card-header__title mb-2">Total Withdraw</div>
                        <div class="text-amount">@money($totalwithraws)</div>
                    </div>
                   
                </div>
                <div class="card-body text-muted flex d-flex ">
                    <div class="row no-gutters w-100">
                    
                        <div class="col-lg-12 card-form__body">

                            <div class="table-responsive border-bottom">

                               
                                <table class="table mb-0 thead-border-top-0">
                                    <thead>
                                        <tr>

                                            <th>Amount</th>

                                            <th>Status</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="staff02">
                                        @forelse ($withdraws as $withdraw)
                                            <tr>
                                                <td>
                                                    @money($withdraw['amount'])
                                                </td>
                                                @if($withdraw['withdraw_status'] == 0)
                                                    <td><span class="badge badge-danger">PENDING</span></td>
                                                @elseif ($withdraw['withdraw_status'] == 3)
                                                    <td><span class="badge badge-warning">DECLINED</span></td>
                                                @else
                                                    <td><span class="badge badge-success">APPROVED</span></td>
                                                @endif
                                                
                                                <td><small class="text-muted">{{ $withdraw['created_at'] }}</small></td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger" role="alert">No project type</div>
                                        @endforelse
                                        

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection