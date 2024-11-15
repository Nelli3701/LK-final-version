<div class="logo">
    @if (!request()->is('/'))
    <a href="/" class="logo-link">
        <img src="{{ $src }}" alt="{{ $alt }}" class="logo-img">
        <span class="logo-text">{!! $text !!}</span>
    </a>
    @else
    <span class="logo-link">
        <img src="{{ $src }}" alt="{{ $alt }}" class="logo-img">
        <span class="logo-text">{!! $text !!}</span>
    </span>
    @endif
</div>