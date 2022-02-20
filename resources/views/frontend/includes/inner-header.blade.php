
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{ asset('frontend') }}/images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36" style="">{{ $title }}</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="text-white" style="">{{ $breadcrumb }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>