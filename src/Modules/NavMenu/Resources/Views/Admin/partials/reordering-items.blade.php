<section id="order-menu-items">
    <label>Organise Your Menu Items</label>
    <div class="cf nestable-lists">
        <div class="dd" id="nestable">
            <ol class="dd-list">
                @if(!empty($tree_structure))
                    {!!$output_nav_tree!!}
                @endif
                @if(isset($navmenu))
                    @foreach($navmenu->menuitems as $menuitem)
                        @if(!in_array($menuitem->id , $stored_values))
                            <li class="dd-item" data-id="{!!$menuitem->id!!}">
                               <span class="float-right">
                                  <a title="Edit Menu Item" href="{{ route('mc-admin.navmenuitems.edit', $menuitem->id) }}" class="icon-button info trigger-reveal"><i class="far fa-edit"></i></a>
                                  <a title="Remove Menu Item" href="{{ route('mc-admin.navmenuitems.confirm-delete', $menuitem->id) }}" class="icon-button alert trigger-reveal"><i class="far fa-trash-alt"></i></a>
                              </span>
                                <div class="dd-handle">{!!$menuitem->title!!}</div>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ol>
        </div>
    </div>
</section>

