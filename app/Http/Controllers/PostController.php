// ...existing code...
public function like(Post $post)
{
    $user = auth()->user();
    if ($post->isLikedBy($user)) {
        $post->likes()->where('user_id', $user->id)->delete();
    } else {
        $post->likes()->create(['user_id' => $user->id]);
    }
    return response()->json(['likes' => $post->likes->count()]);
}

public function favorite(Post $post)
{
    $user = auth()->user();
    if ($post->isFavoritedBy($user)) {
        $post->favorites()->where('user_id', $user->id)->delete();
    } else {
        $post->favorites()->create(['user_id' => $user->id]);
    }
    return response()->json(['status' => 'success']);
}

public function favorites()
{
    $user = auth()->user();
    $posts = $user->favorites()->with('post')->get()->pluck('post');
    return view('favorites', compact('posts'));
}
// ...existing code...
