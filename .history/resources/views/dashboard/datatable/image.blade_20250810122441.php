{{-- <img src="{{ asset($url) }}" alt="image" width="200" hight="70"> --}}


<div style="display: flex; justify-content: center;">
    @if ($url)
        <img src="{{ asset($url) }}" alt="image"
            style="
                width: 70px;
                height: 60px;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 2px 6px rgba(0,0,0,0.15);
                transition: transform 0.2s ease-in-out;
             "
            onmouseover="this.style.transform='scale(1.3)'" onmouseout="this.style.transform='scale(1)'" />
    @else
        <span style="color: #888;">No Image</span>
    @endif
</div>
