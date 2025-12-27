<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Numbers Validator</title>
    <style>
        /* ... (Keep your existing CSS styles exactly as they were) ... */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #333;
        }

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label {
            font-size: 12px;
            color: #666;
            font-weight: 500;
        }

        select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            min-width: 200px;
            cursor: pointer;
            background-color: white;
        }

        .info-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            background-color: #2196F3;
            color: white;
            border-radius: 50%;
            font-size: 12px;
            font-weight: bold;
            margin-left: 5px;
            cursor: help;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background-color: #f8f9fa;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            color: #212529;
        }

        .state-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .state-ok {
            background-color: #d4edda;
            color: #155724;
        }

        .state-nok {
            background-color: #f8d7da;
            color: #721c24;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        }

        .pagination .active {
            background-color: #4CAF50;
            color: white;
            border-color: #4CAF50;
        }

        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }

        .stat-item {
            flex: 1;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .clear-cache-btn {
            padding: 10px 20px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Phone numbers</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="filters">
            <form method="GET" action="{{ route('phone-numbers.index') }}"
                style="display: flex; gap: 15px; align-items: center;">
                <div class="filter-group">
                    <label for="country">
                        Select country
                        <span class="info-icon" title="Filter by country">i</span>
                    </label>
                    <select name="country" id="country" onchange="this.form.submit()">
                        <option value="">All Countries</option>
                        @foreach($countries as $countryData)
                            <option value="{{ $countryData['code'] }}" {{ $selectedCountry === $countryData['code'] ? 'selected' : '' }}>
                                {{ $countryData['name'] }} ({{ $countryData['code'] }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label for="state">
                        Valid phone numbers
                        <span class="info-icon" title="Filter by valid/invalid state">i</span>
                    </label>
                    <select name="state" id="state" onchange="this.form.submit()">
                        <option value="">All States</option>
                        <option value="ok" {{ $selectedState === 'ok' ? 'selected' : '' }}>Valid (OK)</option>
                        <option value="nok" {{ $selectedState === 'nok' ? 'selected' : '' }}>Invalid (NOK)</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-label">Total Records</div>
                <div class="stat-value">{{ $phoneNumbers->total() }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Current Page</div>
                <div class="stat-value">{{ $phoneNumbers->currentPage() }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Per Page</div>
                <div class="stat-value">{{ $phoneNumbers->perPage() }}</div>
            </div>
        </div>

        @if($phoneNumbers->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>State</th>
                        <th>Country code</th>
                        <th>Phone num.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phoneNumbers as $phone)
                        <tr>
                            <td>{{ $phone['country'] ?? 'Unknown' }}</td>
                            <td>
                                <span class="state-badge state-{{ strtolower($phone['state']) }}">
                                    {{ $phone['state'] }}
                                </span>
                            </td>
                            <td>{{ $phone['country_code'] ?? 'N/A' }}</td>
                            <td>{{ $phone['phone_number'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{-- Previous Page Link --}}
                @if ($phoneNumbers->onFirstPage())
                    <span class="disabled">⟨ Prev</span>
                @else
                    <a href="{{ $phoneNumbers->previousPageUrl() }}">⟨ Prev</a>
                @endif

                {{-- Numeric Page Links --}}
                @foreach ($phoneNumbers->getUrlRange(1, $phoneNumbers->lastPage()) as $page => $url)
                    @if ($page == $phoneNumbers->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($phoneNumbers->hasMorePages())
                    <a href="{{ $phoneNumbers->appends(request()->query())->nextPageUrl() }}">Next ⟩</a>
                @else
                    <span class="disabled">Next ⟩</span>
                @endif
            </div>
        @else
            <div class="no-results">
                <p>No phone numbers found matching your criteria.</p>
            </div>
        @endif
    </div>
</body>

</html>
