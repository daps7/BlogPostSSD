require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const postId = this.dataset.postId;
            likePost(postId, this);
        });
    });
});

function likePost(postId, button) {
    fetch(`/posts/${postId}/like`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.likes !== undefined) {
            document.getElementById(`like-count-${postId}`).innerText = data.likes;
            button.innerText = data.liked ? 'Unlike' : 'Like';
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}
