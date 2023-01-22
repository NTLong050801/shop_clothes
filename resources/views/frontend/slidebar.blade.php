<div class="col-lg-3">
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>All departments</span>
        </div>
        <ul>
            {!! \App\Helpers\Helper::showAllCate($categories) !!}
        </ul>
    </div>
</div>
