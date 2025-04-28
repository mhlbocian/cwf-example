<p>
    Json driver uses the CWF-PHP Json backend. The files are stored in the
    <code>Data</code> directory. This driver uses 2 files for storing information
    about users and groups. Memberships data is stored in both files.
</p>

<pre>
<b>Config/authentication.json</b>

{
    "driver": "json",
    <i>"users_file": "[users file]",
    "groups_file": "[groups file]"</i>
}
</pre>

<p>
    ⚠️ Defining users and groups file names is optional. By default
    <code>users</code> and <code>groups</code> are taken.
</p>

<p>
    The data is stored in the format shown below:
</p>

<pre>
<b>Data/[users_file].json</b>
{
    "<i>[username]</i>": {
        "fullname": "<i>[fullname]</i>",
        "password": "<i>[password hash]</i>",
        "groups": [<i>[groupname1], [groupname2], ...</i>]
    },
    <i>[other users]</i>
}

<b>Data/[groups_file].json</b>
{
    "<i>[groupname]</i>": {
        "description": "<i>[description]</i>",
        "members": [<i>[username1], [username2], ...</i>]
    },
    <i>[other groups]</i>
}
</pre>
