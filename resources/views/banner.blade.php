<section>
    <h2>{{ trans('croustillon::cookies.banner.title') }}</h2>

    @foreach (trans('croustillon::cookies.banner.text') as $text)
        <p>{!! $text !!}</p>
    @endforeach

    <form action="{{ route('croustillon.cookies.store') }}" method="post">
        @csrf

        <fieldset>
                @foreach (croustillon()->cookiesByCategory()->keys() as $category)
                    <label for="{{ class_basename($category) }}">
                        <input
                            type="checkbox"
                            name="cookie-policies[]"
                            id="{{ class_basename($category) }}"
                            value="{{ croustillon()->category($category)->value() }}"
                            {{
                                croustillon()->category($category)->mandatory()
                                    ? 'disabled checked'
                                    : ''
                            }}
                        >
                    </label>
                @endforeach
        </fieldset>

        <button
            type="submit"
            tabindex="1"
        >
            {{ trans('croustillon::cookies.banner.submit') }}
        </button>
    </form>
</section>
