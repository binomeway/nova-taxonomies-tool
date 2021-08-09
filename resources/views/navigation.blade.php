<h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
    </svg>

    <span class="sidebar-label">
        {{ __('Taxonomies') }}
    </span>
</h3>

<ul class="list-reset mb-8">
    <li class="leading-wide mb-4 text-sm">
        <router-link :to="{
        name: 'index',
        params: {
            resourceName: 'taxonomy-types'
        }
        }" class="text-white ml-8 no-underline dim">
            {{ __('Types') }}
        </router-link>
    </li>

    <li class="leading-wide mb-4 text-sm">
        <router-link :to="{
        name: 'index',
        params: {
            resourceName: 'tags'
        }
        }" class="text-white ml-8 no-underline dim">
            {{ __('Tags') }}
        </router-link>
    </li>

</ul>
