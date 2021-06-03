@extends('layouts.app')

@section('template_title')
    Expense
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Expense') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Date Expense</th>
										<th>Invoice</th>
										<th>Merchandise Supplier</th>
										<th>Price Expense</th>
										<th>Type Expense</th>
										<th>Receipt Number</th>
										<th>Description Expense</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $expense->date_expense }}</td>
											<td>{{ $expense->invoice }}</td>
											<td>{{ $expense->merchandise_supplier }}</td>
											<td>{{ $expense->price_expense }}</td>
											<td>{{ $expense->type_expense }}</td>
											<td>{{ $expense->receipt_number }}</td>
											<td>{{ $expense->description_expense }}</td>

                                            <td>
                                                <form action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('expenses.show',$expense->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('expenses.edit',$expense->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $expenses->links() !!}
            </div>
        </div>
    </div>
@endsection
