# Core

Core is simple php engine for simple apps

# Start with docker

# Simple start


# Settings

All settings located in config.php

### database

```
$db_settings = [
    "db_hostname" => "localhost",
    "db_username" => "user",
    "db_password" => "userpwd",
    "db_name"     => "dbname"
];
```

### routing

```
$routes = [
    "user" => [
        "pattern" => "default",
        "data" => [
            ... 
        ]
    ]
    "users/admin" => ["pattern" => "default"]               
];
```

<b>/user</b> route to /include/user.php<br>
/users/admin route to /include/users/admin.php, if path exists<br>
/users/admin/100/500 route to /include/users/admin.php, other parameters available in 
$args array<br>

data available in $data array

### patterns

```
trait Patterns {

    function pattern_default($path) {
        $this->load('header');
        $this->load($path);
        $this->load('footer');
    }

    function pattern_blank($path) {
        $this->load($path);
    }

    function pattern_error($path) {
        http_response_code(404);
        $this->load('header');
        $this->load('error');
        $this->load('footer');
    }

}
```

each route uses one pattern<br>
load method 
 
pattern error use when route not found

 