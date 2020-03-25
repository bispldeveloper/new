<div class="row">
    <div class="small-12 medium-6 columns">
        <div class="content-block">
            <p class="content-block-title">Imagery</p>
            <div class="content">
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('logo', 'Logo', ['class' => $errors->first('logo', 'is-invalid-label')]) !!}
                        <div class="input-group">
                            {!! Form::text('logo', null, ['class' => 'input-group-field ' . $errors->first('logo', 'is-invalid-input')]) !!}
                            <div class="input-group-button">
                                <input type="submit" class="button form-browse moxie-image-browse" data-moxie-field="logo" value="Browse">
                            </div>
                        </div>
                        {!! $errors->first('logo', '<span class="form-error is-visible">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('dashboard_banner', 'Dashboard Banner', ['class' => $errors->first('logo', 'is-invalid-label')])!!}
                        <div class="input-group">
                            {!! Form::text('dashboard_banner', null, ['class' => 'input-group-field ' .  $errors->first('dashboard_banner', 'is-invalid-input')]) !!}
                            <div class="input-group-button">
                                <input type="submit" class="button moxie-image-browse" data-moxie-field="dashboard_banner" value="Browse">
                            </div>
                        </div>
                        {!! $errors->first('dashboard_banner', '<span class="form-error is-visible">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('auth_background', 'Auth Background', ['class' => $errors->first('auth_background', 'is-invalid-label')])!!}
                        <div class="input-group">
                            {!! Form::text('auth_background', null, ['class' => 'input-group-field ' . $errors->first('auth_background', 'is-invalid-input')]) !!}
                            <div class="input-group-button">
                                <input type="submit" class="button moxie-image-browse" data-moxie-field="auth_background" value="Browse">
                            </div>
                        </div>
                        {!! $errors->first('auth_background', '<span class="form-error is-visible">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="small-12 medium-6 columns">
        <div class="content-block">
            <p class="content-block-title">Off Canvas Colours</p>
            <div class="content">
                <div class="row">
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('offcanvas_bg', 'Background Color', ['class' => $errors->first('offcanvas_bg', 'is-invalid-label')]) !!}
                        {!! Form::text('offcanvas_bg', null, ['class' => 'colors', 'data-branding-option' => 'background-color', 'data-branding-class' => '.off-canvas']) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('offcanvas_heading_link_color', 'Link Heading Color', ['class' => $errors->first('offcanvas_heading_link_color', 'is-invalid-label')]) !!}
                        {!! Form::text('offcanvas_heading_link_color', null, ['class' => 'colors', 'data-branding-option' => 'color', 'data-branding-class' => '.off-canvas .nav-block p.title']) !!}
                    </div>
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('offcanvas_link_color', 'Link Color', ['class' => $errors->first('offcanvas_link_color', 'is-invalid-label')]) !!}
                        {!! Form::text('offcanvas_link_color', null, ['class' => 'colors', 'data-branding-option' => 'color', 'data-branding-class' => '.off-canvas .nav-block ul.menu.vertical li a']) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('offcanvas_link_color_active', 'Active Link Color', ['class' => $errors->first('offcanvas_link_color_active', 'is-invalid-label')]) !!}
                        {!! Form::text('offcanvas_link_color_active', null, ['class' => 'colors', 'data-branding-option' => 'color', 'data-branding-class' => '.off-canvas .nav-block ul.menu.vertical li a.active']) !!}
                    </div>
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('offcanvas_link_background_color_active', 'Active Link Background Color', ['class' => $errors->first('offcanvas_link_background_color_active', 'is-invalid-label')]) !!}
                        {!! Form::text('offcanvas_link_background_color_active', null, ['class' => 'colors', 'data-branding-option' => 'background-color', 'data-branding-class' => '.off-canvas .nav-block ul.menu.vertical li a.active']) !!}
                    </div>
                    <div class="small-12  medium-4  columns">
                        {!! Form::label('offcanvas_link_icon_color_active', 'Active Link Icon Color', ['class' => $errors->first('offcanvas_link_icon_color_active', 'is-invalid-label')]) !!}
                        {!! Form::text('offcanvas_link_icon_color_active', null, ['class' => 'colors', 'data-branding-option' => 'color', 'data-branding-class' => '.off-canvas .nav-block ul.menu.vertical li a.active i']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block">
            <p class="content-block-title">Top Bar Colours</p>
            <div class="content">
                <div class="row">
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('topbar_bg', 'Background Color', ['class' => $errors->first('topbar_bg', 'is-invalid-label')]) !!}
                        {!! Form::text('topbar_bg', null, ['class' => 'colors', 'data-branding-option' => 'background-color', 'data-branding-class' => '.top-bar, .top-bar ul.dropdown.menu, .top-bar ul.dropdown.menu > li ul.is-dropdown-submenu']) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('topbar_link_color', 'Link Color', ['class' => $errors->first('topbar_link_color', 'is-invalid-label')]) !!}
                        {!! Form::text('topbar_link_color', null, ['class' => 'colors', 'data-branding-option' => 'color', 'data-branding-class' => '.top-bar ul.dropdown.menu > li > a, .top-bar ul.dropdown.menu > li ul.is-dropdown-submenu li.is-submenu-item a']) !!}
                    </div>
                    <div class="small-12 medium-4 columns">
                        {!! Form::label('topbar_link_color_hover', 'Link Color Hover', ['class' => $errors->first('topbar_link_color_hover', 'is-invalid-label')]) !!}
                        {!! Form::text('topbar_link_color_hover', null, ['class' => 'colors', 'data-branding-option' => 'color', 'data-branding-class' => '.off-canvas .nav-block ul.menu.vertical li a']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>