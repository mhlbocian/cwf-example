<p>
    Database driver uses the CWF-PHP database connection system. To use this
    driver, set up a database connection in the <code>Config/database.json</code>
    file.
</p>

<p>
    Once you have configured database connection, create the
    <code>authentication.json</code> file with the data shown below.
</p>

<pre>
<b>Config/authentication.json</b>

{
    "driver": "database",
    "connection": "<i>[connection name]</i>"
    <i>"users_table": "[users table]",
    "groups_table": "[groups table]",
    "memberships_table": "[memberships table]"</i>
}
</pre>

<p>
    ⚠️ Defining table names is optional. By default <code>users</code>,
    <code>groups</code> and <code>memberships</code> are taken, as the table
    names.
</p>

<p>
    Each table must include <b>at least</b> theese columns with <b>exact</b>
    names. More columns are allowed, but are not passed by the driver.
</p>

<pre>
<b>Table: [users]</b>
+==============+==============+==============+
|   username   |   fullname   |   password   |
+==============+==============+==============+
| varchar(255) | varchar(255) | varchar(255) |
+==============+==============+==============+

PRIMARY KEY: username

<b>Table: [groups]</b>
+==============+==============+
|  groupname   |  description |
+==============+==============+
| varchar(255) | varchar(255) |
+==============+==============+

PRIMARY KEY: groupname

<b>Table: [memberships]</b>
+==============+==============+
|   username   |  groupname   |
+==============+==============+
| varchar(255) | varchar(255) |
+==============+==============+

FOREGIN KEY: username -> users.username
FOREGIN KEY: groupname -> groups.groupname
</pre>