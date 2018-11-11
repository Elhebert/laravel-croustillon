<article>
    <div>
        <header>
            @include("croustillon::lang.{$locale}.policy.intro")
        </header>

        <main role="main">
            <ol>
                <li>
                    <section>
                        @include("croustillon::lang.{$locale}.policy.whatIsACookie")
                    </section>
                </li>
                <li>
                    <section>
                        @include("croustillon::lang.{$locale}.policy.whichCookieDoWeUse")
                    </section>
                </li>
                <li>
                    <section>
                        @include("croustillon::lang.{$locale}.policy.howToParametersCookies")
                    </section>
                </li>
                <li>
                    <section>
                        @include("croustillon::lang.{$locale}.policy.doesItWorkWithoutCookies")
                    </section>
                </li>
                <li>
                    <section>
                        @include("croustillon::lang.{$locale}.policy.otherQuestions")
                    </section>
                </li>
            </ol>
        </main>
    </div>
</article>
