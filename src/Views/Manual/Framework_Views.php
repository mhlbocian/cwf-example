<p>
    CWF-PHP provides support for views. Views are standard php files, where you
    can mix PHP code with html. It is recommended to use alternative syntax for
    the control structures, and the short syntax <code>&lt;?= $var ?&gt;</code>.
    Views are stored in the <code>Views</code> directory, and must have the
    <code>.php</code> extension.
</p>

<p>
    Remember to bind your view variables from the controller's level. It is
    possible to embed other PHP code inside the view, however it is not a good
    practice, due to separation of the data and the presentation layer. Views
    can be also nested and the files can be located in the subdirectories.
</p>

<p><b>Example</b></p>

<pre>
<b>Views/Main.php</b>

&lt;!doctype html&gt;
&lt;html&gt;&lt;head&gt;
    &lt;meta charset="utf-8" /&gt;
    &lt;title&gt; &lt;?= $title ?&gt; &lt;/title&gt;
&lt;/head&gt;&lt;body&gt;
    &lt;h1&gt; Welcome to the Home Page! &lt;/h1&gt;
    &lt;hr /&gt;
    &lt;?= $content ?&gt;
&lt;/body&gt;&lt;html&gt;

<b>Views/Elements/Posts.php</b>

&lt;?php foreach ($posts as $post): ?&gt;
    &lt;article&gt;
        &lt;p&gt;Author: &lt;?= $post["author"] ?&gt; (&lt;?= $date ?&gt;)&lt;/p&gt;
        &lt;h3&gt; &lt;?= $post["title"] ?&gt; &lt;/h3&gt;
        &lt;p&gt; &lt;?= $post["content"] ?&gt; &lt;/p&gt;
        &lt;hr /&gt;
    &lt;/article&gt;
&lt;?php endforeach; ?&gt;

<b>Controllers/Main.php</b>
</pre>

<?php
$code = <<<HERE
<?php
namespace YourName\YourProject\Controllers;

use CwfPhp\CwfPhp\View;

class Main {
    
    private View \$main_view; 

    public function __construct() {
        \$this->main_view = new View("Main");
    }

    public function Index(): void {
        \$this->main_view->Bind("title", "Main Page");
        \$this->main_view->Bind("content", "Welcome to our project!");
    }

    public function Posts(): void {
        \$posts = [
            ["author" => "Some author", "date" => "01.01.2025",
                "content" => "Example content number 1"],
            ["author" => "Another author", "date" => "01.02.2025",
                "content" => "Example content number 2"],
            ["author" => "Unknown author", "date" => "01.03.2025",
                "content" => "Example content number 3"]
        ];
        \$posts_view = new View("Elements/Posts");
        \$posts_view->Bind("posts", \$posts);

        \$this->main_view->Bind("title", "Posts");
        \$this->main_view->Bind("content", \$posts_view);
    }

    public function __destruct() {
        echo \$this->main_view;
    }
}
HERE;
highlight_string($code);
?>

<p>
    If you type in your address bar <code>index.php/Main/Index</code>, you
    should see a page with the text <code>Welcome to our project!</code>.
</p>

<p>
    If you type in your address bar <code>index.php/Main/Posts</code>, you
    should see a page with three posts.
</p>