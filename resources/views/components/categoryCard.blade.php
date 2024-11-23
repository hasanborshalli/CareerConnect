<div class="category-card">
    <img src="/img/categories/{{$image}}" class="category-image" alt="">
    <h2 class="category-title">{{htmlspecialchars_decode($title)}}</h2>
    <p>{{$countJobs}} jobs available</p>
    <button class="btn-browse" onclick="window.location.href='/job/category?category_id={{$categoryId}}'">Browse Jobs</button>
</div>