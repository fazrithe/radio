      <!-- header-section start  -->
  <header class="header">
    <div class="header__bottom">
      <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">
          <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('assets/images/logoIcon/logo.png')); ?>" alt="<?php echo app('translator')->get('site-logo'); ?>">
            <div class="equalizer">
              <span class="equalizer-item equalizer-1"></span>
              <span class="equalizer-item equalizer-2"></span>
              <span class="equalizer-item equalizer-3"></span>
              <span class="equalizer-item equalizer-4"></span>
              <span class="equalizer-item equalizer-5"></span>				
              <span class="equalizer-item equalizer-6"></span>
              <span class="equalizer-item equalizer-7"></span>
              <span class="equalizer-item equalizer-8"></span>
              <span class="equalizer-item equalizer-9"></span>
              <span class="equalizer-item equalizer-10"></span>
              <span class="equalizer-item equalizer-11"></span>
              <span class="equalizer-item equalizer-12"></span>
              <span class="equalizer-item equalizer-none"></span>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ms-auto align-items-center">
              <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
              <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($page->name = 'contact'): ?>
                    <?php continue; ?>
                  <?php endif; ?>
                  <li><a href="<?php echo e(route('pages',$page->slug)); ?>"><?php echo e(__($page->name)); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              <li><a href="<?php echo e(route('events')); ?>"><?php echo app('translator')->get('Archive Events'); ?></a></li>
              <li><a href="<?php echo e(route('jockey')); ?>"><?php echo app('translator')->get('All Jockey'); ?></a></li>
              <li><a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('Contact'); ?></a></li>
              <li class="nav-right">
                <select name="language" class="langSel select">
                  <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                  <option value="<?php echo e($lang->code); ?>" <?php echo e(session('lang') == $lang->code ? 'selected' : ''); ?>><?php echo e(__($lang->name)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div><!-- header__bottom end -->
  </header>
  <!-- header-section end  -->
<?php /**PATH C:\xampp7.4\htdocs\radioallomas\core\resources\views/templates/basic/partials/navbar.blade.php ENDPATH**/ ?>