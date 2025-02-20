require('./bootstrap');

function likePost(postId) {
    fetch(`/like/${postId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById(`like-count-${postId}`).innerText = data.likes;
    })
    .catch(error => console.error('Error:', error));
}

function favoritePost(postId) {
    fetch(`/favorite/${postId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .catch(error => console.error('Error:', error));
}
