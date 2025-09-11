

@if ()
    <div style="display: flex; justify-content: center;">
    <img src="{{ asset($url ?: 'default.png') }}" class="datatable-image" alt="image"
        style="
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            transition: transform 0.2s ease-in-out;
        "
        onmouseover="this.style.transform='scale(1.3)'" 
        onmouseout="this.style.transform='scale(1)'" />
</div>
@else
    
@endif