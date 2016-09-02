 <section id="form_input">
        <div class="container">
            <div class="block">
                <div class="col-md8 col-md-offset-1">
                    <form method=POST action="" enctype="multipart/form-data">
                        <div class="form-inline">
                            <input type="text" name="login" class="form-control" placeholder="| Login" value="<?php echo @$fdata['login'];?>">
                        </div><br />
                        <div class="form-inline">
                            <input type="text" name="name" class="form-control" placeholder="| Имя" value="<?php echo @$fdata['name'];?>">
                        </div><br />
                        <div class="form-inline">
                            <input type="text" name="age" class="form-control" placeholder="| Ваш возраст" value="<?php echo @$fdata['age'];?>">
                        </div><br />
                        <div class="form-inline">
                            <textarea rows="10" name="about" cols="23" placeholder="| О себе" value="<?php echo @$fdata['about'];?>"></textarea>
                        </div><br />
                        <div class="form-inline">
                            <input type="password" name="password" class="form-control" placeholder="| Пароль">
                        </div><br />
                        <div class="form-inline">
                            <input type="password" name="password1" class="form-control" placeholder="| Повторите пароль">
                        </div><br />
                        <div class="form-inline">
                            <label for="InputFile">Загрузить изображение</label>
                            <input type="file" name="avatar">
                        </div><br />
                        <button type="submit" name="enter" class="btn btn-default" value="Регистрация">Регистрация</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
