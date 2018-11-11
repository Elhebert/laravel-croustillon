<table>
    <thead>
        <tr>
            <th>{{ trans('croustillon::policy.label.cookie') }}</th>
            <th>{{ trans('croustillon::policy.label.usage') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach (croustillon()->cookiesByCategory()->keys() as $category)
        <tr>
            <td>{{ croustillon()->category($category)->name() }}</td>
            <td>{{ croustillon()->category($category)->description() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
