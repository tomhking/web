@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Progress</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Raised ETH</th>
                        <th>Transaction Count</th>
                        <th>Average value per TX</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ number_format($raisedEth, 4) }} ETH</td>
                        <td>{{ $txns->count() }}</td>
                        <td>{{ number_format($txns->average('value')/bcpow(10,18),2) }} ETH</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <h2>Transactions</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                       <th>Day</th>
                       <th>Transaction Count</th>
                       <th class="text-right">ETH value</th>
                       <th class="text-right">Average value per TX</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($txnsByDay as $day => $txns)
                        <tr>
                            <td><a href="{{ route('admin.txns', ['date' => $day, 'key' => $key]) }}#term-stats">{{ $day }}</a></td>
                            <td><a href="{{ route('admin.txns', ['date' => $day, 'key' => $key]) }}#txns">{{ $txns->count() }}</a></td>
                            <td class="text-right">{{ number_format($txns->sum('value')/bcpow(10,18),2) }} ETH</td>
                            <td class="text-right">{{ number_format($txns->average('value')/bcpow(10,18),2) }} ETH</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <h2 id="term-stats">
                    @if($hasDate)
                        Statistics for {{ $date }}
                        <a href="{{ route('admin.txns', compact('key')) }}#term-stats" class="btn btn-xs btn-default">show all</a>
                    @else
                        All time stats
                    @endif
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Contributions by country</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Country</th>
                        <th class="text-right">ETH</th>
                        <th>txns</th>
                        <th class="text-right">ETH per tx</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countryTxns as $country => $txns)
                        <tr>
                            <td>{{ $country }}</td>
                            <td class="text-right">{{ number_format($txns->sum('value')/bcpow(10,18),2) }} ETH</td>
                            <td>{{ $txns->count() }}</td>
                            <td class="text-right">{{ number_format($txns->average('value')/bcpow(10,18),2) }} ETH</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Top 10 contributors</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Address</th>
                        <th>Contribution</th>
                        <th>Country</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($holders->slice(0,10) as $address => $txns)
                        <tr>
                            <td style="font-size:1.5rem"><code><a target="_blank" href="https://etherscan.io/address/{{ $address }}">{{ substr($address,0,16) }}...</a></code></td>
                            <td class="text-right">{{ number_format($txns->sum('value')/bcpow(10,18),2) }} ETH</td>
                            <td>{{ $tx->country ?? "UNKNOWN" }}</td>
                            <td>
                                @if($users->has($address))
                                    @php($user = $users->get($address))
                                    {{ trim($user->first_name. " " . $user->last_name) ? : "name not set" }} <br>
                                    {{ $user->birthday ? $user->birthday->format('Y-m-d') : "birthday not set"}} <br>
                                    @if($user->identification)
                                        <div class="text-success">identification uploaded</div>
                                    @else
                                        <div class="text-warning">identification not uploaded</div>
                                    @endif
                                @else
                                    <div class="text-muted">N/A</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="txns">
            <div class="col-md-12">
                <h2>
                    @if($hasDate)
                        Transactions for {{ $date }}
                        <a href="{{ route('admin.txns', compact('key')) }}#txns" class="btn btn-xs btn-default">show all</a>
                    @else
                        All transactions
                    @endif
                </h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>TX</th>
                        <th>Address</th>
                        <th>Value</th>
                        <th>Country</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filteredTxns->reverse() as $tx)
                        <tr style="font-size: 1.4rem">
                            <td title="{{ date('Y-m-d H:i:s', $tx->timeStamp) }}">{{ Carbon\Carbon::createFromTimestamp($tx->timeStamp)->diffForHumans() }}</td>
                            <td><code><a target="_blank" href="https://etherscan.io/tx/{{ $tx->hash }}">{{ substr($tx->hash,0,32) }}...</a></code></td>
                            <td><code><a target="_blank" href="https://etherscan.io/address/{{ $tx->from }}">{{ $tx->from }}</a></code></td>
                            <td class="text-right">{{ number_format($tx->value / bcpow(10,18), 4) }} ETH</td>
                            <td>{{ $tx->country }}</td>
                            <td>
                                @if($tx->user)
                                    {{ trim($tx->user->first_name. " " . $tx->user->last_name) ? : "name not set" }} <br>
                                    {{ $tx->user->birthday ?? "birthday not set"}} <br>
                                    @if($tx->user->identification)
                                        <div class="text-success">identification uploaded</div>
                                    @else
                                        <div class="text-warning">identification not uploaded</div>
                                    @endif
                                @else
                                    <div class="text-muted">N/A</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection