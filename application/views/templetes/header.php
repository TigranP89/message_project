<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $data ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <style>
        body{
            background-color: #e6f5ff;
        }
        input[type=button] {
            width: 130px;           
            color: white;
            padding: 5px 20px;
            margin: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        /*registration*/
        .reg-page {
            width: 560px;
            padding: 8% 0 0;
            margin: auto;
	}
        .form-reg {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 720px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form-reg input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 5px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
	}
        .form-reg .form-group{
            height: 75px !important;
        }
        /*login*/
        .login-page {
            width: 560px;
            padding: 8% 0 0;
            margin: auto;
	}
	.form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 460px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
		}
	.form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 50%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
	}     
        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
	}
        
        .p-2 {
            padding: 1rem !important;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse; 		
	}
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
	}
        
        .heart {
            width: 100px;
            height: 100px;
            background: url("https://cssanimation.rocks/images/posts/steps/heart.png") no-repeat;
            background-position: 0 0;
            cursor: pointer;
            transition: background-position 1s steps(28);
            transition-duration: 0s;

            &.is-active {
              transition-duration: 1s;
              background-position: -2800px 0;
            }
        }
        .search-container{
            /*margin: auto;*/
            width: 50%;
            padding: 10px;
            
        }
       .save button{
           width: 130px;           
            color: white;
            padding: 5px 20px;           
            margin: 20px 0px 0px 150px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
       }       
        a.button {
            background-color: #3399ff;
            box-shadow: 0 3px 0 #b3d9ff;
            color: white;
            padding: 0.5em 1em;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            float: right;
          }

        a.button:hover {
            background-color: #3366ff;
        }

        a.button:active {
            box-shadow: none;
            top: 3px;
        }
    </style>
</head>
<body>
<?php 
    if ($this->session->userdata('userId') != "") { 
?>
    <div class="d-flex justify-content-end">
        
        
        <div style="display: none;"> 
            <form > 
                <input type="button" value="REGISTER" class="btn btn-primary float-end m-3" onclick="window.location.href='http://localhost/index.php/registration/index'">
            </form>
            <form>
                <input type="button" value="LOGIN" class="btn btn-primary float-end m-3" onclick="window.location.href='http://localhost/index.php/login/index'">
            </form>    
        </div>
          <div class="showNote">
            <form action="http://localhost/" method="POST">
                <button class="btn btn-primary float-end m-3">All Messages</button>	
            </form>		
        </div>

        <div class="showNote">
            <form action="http://localhost/index.php/home/showUserMessages" method="POST">
                <button class="btn btn-primary float-end m-3">My Messages</button>
            </form>
        </div>

      
        <div class="showNote">
            <form action="http://localhost/index.php/users/index" method="POST">
                <button class="btn btn-primary float-end m-3">All Users</button>	
            </form>		
        </div>
        
        <div class="float-end p-3" >
            <a class="btn btn-info" href="http://localhost/index.php/personal/index">
                <?php
                    foreach ($instant_req as $val){
                        echo $val->fname."  ".$val->lname ;
                    }
                ?>
             </a>
        </div>
        
        <div class="logout">
            <form action="http://localhost/index.php/personal/logoutSession" method="POST">
                <button class="btn btn-warning float-end m-3">LOGOUT</button>	
            </form>    
        </div>
    </div>
      

<?php 
    } else {    
?>
    <div class="d-flex justify-content-end">
        <div> 
            <form > 
                <input type="button" value="REGISTER" class="btn btn-primary float-end m-3" onclick="window.location.href='http://localhost/index.php/registration/index'">
            </form>
        </div>    
        <div>    
            <form>
                <input type="button" value="LOGIN" class="btn btn-primary float-end m-3" onclick="window.location.href='http://localhost/index.php/login/index'">
            </form>    
        </div>
        
        
       

        <div class="showNote" style="display: none;">
            <form action="http://localhost/index.php/home/showUserMessages" method="POST">
                <button class="btn btn-primary float-end m-3">My Messages</button>
            </form>
        </div>

        

        <div class="showNote">
            <form action="http://localhost/" method="POST">
                <button class="btn btn-primary float-end m-3">All Messages</button>	
            </form>		
        </div>
        
        <div class="showNote">
            <form action="http://localhost/index.php/users/index" method="POST">
                <button class="btn btn-info float-end m-3">All Users</button>	
            </form>		
        </div>
        
        <div class="float-end p-3" style="display: none;">
            <a href="../../index.php/personal/index">
                <?php
                    foreach ($instant_req as $val){
                        echo $val->fname."  ".$val->lname ;
                    }
                ?>
             </a>
        </div>
        
        <div class="logout" style="display: none;">
            <form action="http://localhost/index.php/personal/logoutSession" method="POST">
                <button class="btn btn-warning float-end m-3">LOGOUT</button>	
            </form>    
        </div>
    </div>    

<?php } ?>
    
