<div class="min-h-screen bg-gray-50" x-data="{ sideBar: false }">
    @include('menu.menu')
    <div class="ml-0 transition md:ml-60">
        @include('menu.user')
        @include('menu.statistics')
        <div class="p-4 mt-0">
            <!-- Add content here, remove div below -->
            <div class="-mt-2 border-4 border-dashed rounded h-96">
                hola
            </div>
        </div>
    </div>
</div>
