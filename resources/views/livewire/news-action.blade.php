<div class="btn-action">
    <button {{ in_array($newsId['id'], $dislikedIds) ? 'disabled' : '' }}
        class="{{ in_array($newsId['id'], $likedIds) ? 'action-selected' : '' }}" wire:click="like">
        <i class="{{ in_array($newsId['id'], $likedIds) ? 'fa-solid' : 'fa-regular' }} fa-thumbs-up"></i>
        {{ $newsId['like'] }}
    </button>

    <button {{ in_array($newsId['id'], $likedIds) ? 'disabled' : '' }}
        class="{{ in_array($newsId['id'], $dislikedIds) ? 'action-selected' : '' }}" wire:click="dislike">
        <i class="{{ in_array($newsId['id'], $dislikedIds) ? 'fa-solid' : 'fa-regular' }} fa-thumbs-down"></i>
        {{ $newsId['dislike'] }}
    </button>

</div>
