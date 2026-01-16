{{--
@component x-plume::navbar.mobile-menu
@description Responsive mobile menu container.
--}}
<div x-show="mobileOpen" class="sm:hidden" id="mobile-menu" style="display: none;">
    <div class="space-y-1 pb-3 pt-2">
        {{ $slot }}
    </div>
</div>
