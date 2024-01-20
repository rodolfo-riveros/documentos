<div class="min-h-screen bg-gray-50" x-data="{ sideBar: false }">
    @include('menu.menu')
    <div class="ml-0 transition md:ml-60">
        @include('menu.user')
        @include('menu.formuser')
        @include('menu.tableuser')
    </div>
</div>
