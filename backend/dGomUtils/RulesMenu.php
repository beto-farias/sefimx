<?php
namespace backend\dGomUtils;

use Yii;
use yii\helpers\Url;

class RulesMenu{

    //Lista de roles del sistema, deben cuadrar con los de la tabla mod_usuarios_cat_roles
    const ROL_ANY = "ANY";
    const ROL_GUEST = "GUEST";


    const ROL_SUPER_ADMIN = "SADM";
    const ROL_ADMIN = "ADM";
    const ROL_USUARIO = "USR";
    

    const menu = [

        // HOME PAGE 
        "home" => [
            "desc"=>"Menu para el home",
            "icon"=>"fas fa-home",
            "text"=>"Home",
            "url"=>"site/index",
            "subItems"=>[],
            "roles"=>[self::ROL_ANY]
        ],

        
        "vendedores" => [
            "desc"=>"Menu para el home",
            "icon"=>"fas fa-home",
            "text"=>"Vendedores",
            "url"=>"vendedores/index",
            "subItems"=>[],
            "roles"=>[self::ROL_ANY]
        ],

    
        //GESTION DE CATALOGOS
        "Catalogos" => [
            "desc"=>"Menu catalogos del sitema",
            "icon"=>"fas fa-table",
            "text"=>"Catálogos",
            "url"=>"usuarios/index",
            "subItems"=>[
                [
                    "text"=>"Aseguradoras",
                    "url"=>"proveedores/index",
                    "icon"=>"fas fa-list",
                    'except-roles'=>[]
                ],
                [
                    "text"=>"Tipos productos",
                    "url"=>"tipos-productos/index",
                    "icon"=>"fas fa-list",
                    'except-roles'=>[]
                ],
                [
                    "text"=>"Productos",
                    "url"=>"productos/index",
                    "icon"=>"fas fa-list",
                    'except-roles'=>[]
                ],
                
                
                [
                    "text"=>"Tipos documentos",
                    "url"=>"tipos-documentos/index",
                    "icon"=>"fas fa-list",
                    'except-roles'=>[]
                ],
                [
                    "text"=>"Tipos de relaciones",
                    "url"=>"tipos-relaciones-clientes/index",
                    "icon"=>"fas fa-list",
                    'except-roles'=>[]
                ],
                
                
                
            ],
            "roles"=>[self::ROL_SUPER_ADMIN, self::ROL_SUPER_ADMIN]
        ],



        //SETUP DE LA HERRAMIENTA
        "Config" => [
            "desc"=>"Configuracion",
            "icon"=>"fas fa-cog",
            "text"=>"Config",
            "url"=>"setup/componente",
            "subItems"=>[],
            "roles"=>[self::ROL_SUPER_ADMIN]
        ],


        ];


        


    public static function getNavBar(){

        if(Yii::$app->user->isGuest){
            $rol = "GUEST";
        }else{
            // $user = Yii::$app->user->identity;
            // $rol = $user->rolUsuario->token;
            $rol = self::ROL_SUPER_ADMIN;
        }

        $str = "";
        foreach(self::menu as $item){

            //Verifica si no esta el rol de ANY y del usuario
            if(!in_array(self::ROL_ANY, $item['roles']) AND !in_array($rol, $item['roles'])){
                continue;
            }
            if(count($item['subItems']) == 0){
                $str .= self::getOneLevelMenu($item);
            }else{
                $str .= self::getMultiLevemMenu($item,$rol);
            }
        }

        return $str;
    }


    private static function getOneLevelMenu($root){
        $str = "";
        $str .='<li class="nav-item">';
        $str .='<a class="nav-link" href="' . Url::base(true) . '/' . $root['url']  . '"><i class="' . $root['icon'] . '"></i> ' . $root['text'] . '</a>';
        $str .='</li>';

        return $str; 
    }


    private static function getMultiLevemMenu($root,$rol){
        $str = "";
        $str .= '<li class="nav-item dropdown">';
        $str .= '<a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="' . $root['icon'] . '"></i> ' . $root['text'] . '</a>';
        $str .= '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        foreach($root['subItems'] as $item){
            //Verifica si el rol del usuario está en la exepcion y no pinta la opcion
            if(isset($item['except-roles'])  AND  in_array($rol, $item['except-roles']) ){
                continue;
            }
            //$str .= '<li class="menu-item sub-menu-item">';
            $str .= '<a class="dropdown-item" href="' . Url::base(true) . "/" . $item['url'] . '"><i class="' . $item['icon'] . '"></i> ' . $item['text'] . '</a>';
            //$str .= '</li>';
        }
        $str .= '</div>';
        $str .='</li>';

        return $str;
    }
}

