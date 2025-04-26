<p>
    <b>"path"</b> means where the index.php file is accessible for the web server
    via URL. If your Public directory is further in the URL path, like:<br/>
    <code>http://hostname/app_dir/index.php</code><br/>
    change it to <code>/app_dir/</code> in this case.
</p>

<p>
    <b>"index"</b> if you want to change default index.php file name, remember to
    change this config file key.
</p>

<p>
    <b>"omit_index"</b> is related to including the "index.php" in the address,
    when accessing controller-action. If you have rewrite engine configured, you
    can set this to <code>true</code>. Then, instead of:<br/>
    <code>http://hostname/index.php/Controller/Action/Arg1/Arg2...</code><br/>
    you have:<br/>
    <code>http://hostname/Controller/Action/Arg1/Arg2...</code>
</p>