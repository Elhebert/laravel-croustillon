<table>
    <thead>
        <tr>
            <th>{{ trans('croustillon::policy.label.name') }}</th>
            <th>{{ trans('croustillon::policy.label.expiration') }}</th>
            <th>{{ trans('croustillon::policy.label.purpose') }}</th>
            <th>{{ trans('croustillon::policy.label.source') }}</th>
            <th>{{ trans('croustillon::policy.label.category') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach (croustillon()->cookies() as $cookie)
        <tr>
            <td>{{ $cookie->name() }}</td>
            <td>
                {{
                    \Carbon\CarbonInterval::fromString($cookie->duration())
                        ->cascade()
                        ->forHumans()
                }}
            </td>
            <td>{{ $cookie->purpose() }}</td>
            <td>{{ $cookie->source() }}</td>
            <td>{{ croustillon()->category($cookie->category)->name() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
