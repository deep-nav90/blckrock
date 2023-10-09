<?php 
    $users_feedback_page = "User's Feedback";
?>
<li @if(isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-item @if($item['text'] == 'Misc Data Management' || $item['text'] == $users_feedback_page) has-treeview @endif()">
    <a class="nav-link @if($item['text'] == 'Dashboard') ds_link @endif() {{ $item['class'] }} @if(isset($item['shift'])) {{ $item['shift'] }} @endif"
       href="{{ $item['href'] }}" @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
       {!! $item['data-compiled'] ?? '' !!}>

        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>

        <p>
            {{ $item['text'] }}

            @if(isset($item['label']))
                <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                    {{ $item['label'] }}
                </span>
            @endif
        </p>

    </a>

</li>