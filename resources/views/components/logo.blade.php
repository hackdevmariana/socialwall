<div class="logo-container">
    <span class="logo-first">{{ $logo->first_word }}</span>
    @if ($logo->second_word)
        <span class="logo-second">{{ $logo->second_word }}</span>
    @endif
    @if ($logo->slogan)
        <span class="slogan">{{ $logo->slogan }}</span>
    @endif
</div>
