<p>
    To enable authentication module, create the <code>authentication.json</code>
    file in the <code>Config</code> directory.
</p>

<pre>
<b>Config/authentication.json</b>

{
    "driver": <i>[authentication driver]</i>,

    <i>[driver specific data]</i>,

    "format": {
        "username": "[\\w][\\w.]{4,}",
        "fullname": ".{5,}",
        "password": ".{8,}",
        "groupname": "[\\w][\\w.]{4,}",
        "description": ".{5,}"
    }
}
</pre>

<p>
    Specify your driver (like database or json), fill the configuration file
    with required driver-specific data and specify format requirements for the
    fields, like username, fullname, password, groupname and its description.
    You can omit <code>format</code> section, or set only the keys you want.
</p>

<p>
    If you don't specify format fields, the default values will be loaded. The
    default values are shown above. Format is defined in the PCRE syntax. For
    example, username must be at leat 5 characters long. First character must be
    a "word" character (<code>a-z A-Z _ 0-9</code>), for next ones, a dot '.' is
    also allowed.
</p>

<p>
    ⚠️ Read the driver documentation, for more information.
</p>