<section>
    <h2>{{ trans('croustillon::cookies.banner.title') }}</h2>

    @include("croustillon::lang.{$locale}.banner.content")

    <form action="{{ route('croustillon.cookies.store') }}" method="post">
        @csrf

        <fieldset>
                @foreach (croustillon()->cookiesByCategory()->keys() as $category)
                    <label for="{{ class_basename($category) }}">
                        <span>{{ croustillon()->category($category)->name() }}</span>
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
