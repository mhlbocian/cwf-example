<?php

namespace Mhlbocian\CwfExample\Controllers;

use CwfPhp\CwfPhp\Auth;
use CwfPhp\CwfPhp\Config;
use CwfPhp\CwfPhp\Router;
use CwfPhp\CwfPhp\Url;
use CwfPhp\CwfPhp\View;
use Mhlbocian\CwfExample\Models\Sitemap;

class Main {

    private View $main;

    public function __construct() {
        $menu = Sitemap::MainMenu(Router::Get_Route());
        $this->main = new View("Main"); 

        $this->main->Bind("app", Config::File("application")->Get("application"));
        $this->main->Bind("title", Sitemap::Title(Router::Get_Route()));

        if (Auth::Instance()->IsLogged()) {
            // replace `Sign In` in menu array with `Logout {$user}`
            $fullname = Auth::Instance()->Session()["fullname"];
            $key = \array_search("Sign in", array_column($menu, "description"));
            $menu[$key]["description"] = "Logout ({$fullname})";
        } else {
            $this->main->Bind("login", null);
        }

        $this->main->Bind("menu", $menu);
    }
    
    public function Auth(): void {
        $view = new View("Main/Auth");

        $view->Bind("users", Auth::Instance()->UserFetch());
        $view->Bind("groups", Auth::Instance()->GroupFetch());
        $view->Bind("status", Router::Get_Args()[0] ?? null);
        $this->main->Bind("content", $view);
    }

    public function Index(): void {
        $view = new View("Main/Index");

        $this->main->Bind("content", $view);
    }

    public function License(): void {
        $view = new View("Main/License");

        $this->main->Bind("content", $view);
    }

    public function Login(): void {
        if (Auth::Instance()->IsLogged()) {
            Auth::Instance()->Logout();
            Url::Redirect();
        }

        $view = new View("Main/Login");

        $view->Bind("status", Router::Get_Args()[0] ?? null);
        $this->main->Bind("content", $view);
    }

    public function Manual(): void {
        $page = Router::Get_Args()[0] ?? null;
        $view = new View("Main/Manual");

        $view->Bind("menu", Sitemap::ManualMenu($page));

        if ($page == null || !Sitemap::ManualExists($page)) {
            $view->Bind("content", null);
        } else {
            try {
                $view->Bind("content", new View("Manual/{$page}"));
            } catch (\Throwable) {
                $view->Bind("content", "<p>Work in progress</p>");
            }
        }

        $this->main->Bind("content", $view);
    }

    public function __destruct() {
        echo $this->main;
    }
}
