

<ul id="main-menu">
    <li id="dash"><a href="index.php"><i class="entypo-gauge"></i><span>Dashboard</span></a></li>
    <li id="regis"><a href="new_entry.php"><i class="entypo-user-add"></i><span>New Registration</span></a></li>
    <li id="paymnt"><a href="payments.php"><i class="entypo-star"></i><span>Payments</span></a></li>
	<li id="other"><a href="other.php"><i class="entypo-plus"></i><span>Other</span></a></li>
    <li class="" id="hassubopen">
        <a href="#" onclick="toggleSubMenu('memExpand')"><i class="entypo-users"></i><span>Members</span></a>
        <ul id="memExpand">
            <li><a href="view_mem.php"><span>Edit Members</span></a></li>
            <li><a href="table_view.php"><span>View Members</span></a></li>
        </ul>
    </li>
    
    <li id="health_status"><a href="new_health_status.php"><i class="entypo-user-add"></i><span>Health Status</span></a></li>

    <li class="" id="planhassubopen">
        <a href="#" onclick="toggleSubMenu('planExpand')"><i class="entypo-quote"></i><span>Sports Plan</span></a>
        <ul id="planExpand">
            <li><a href="new_plan.php"><span>New Sports Plan</span></a></li>
            <li><a href="view_plan.php"><span>Edit Subscription Details</span></a></li>
        </ul>
    </li>

    <li class="" id="overviewhassubopen">
        <a href="#" onclick="toggleSubMenu('overviewExpand')"><i class="entypo-box"></i><span>Overview</span></a>
        <ul id="overviewExpand">
            <li><a href="over_members_month.php"><span>Members per Month</span></a></li>
            <li><a href="over_members_year.php"><span>Members per Year</span></a></li>
            <li><a href="revenue_month.php"><span>Income per Month</span></a></li>
        </ul>
    </li>

    <li class="" id="routinehassubopen">
        <a href="#" onclick="toggleSubMenu('routineExpand')"><i class="entypo-alert"></i><span>Sports Routine</span></a>
        <ul id="routineExpand">
            <li><a href="addroutine.php"><span>Add Sports Routine</span></a></li>
            <li><a href="editroutine.php"><span>Edit Sports Routine</span></a></li>
            <li><a href="viewroutine.php"><span>View Sports Routine</span></a></li>
        </ul>
    </li>
    <li><a href="reports.php"><i class="entypo-folder"></i><span>Reports</span></a></li>
    <li id="adminprofile"><a href="more-userprofile.php"><i class="entypo-user"></i><span>Profile</span></a></li>
    <li id="adminregister"><a href="admin_register.php"><i class="entypo-user"></i><span>Create New Profile</span></a></li>
    <li><a href="logout.php"><i class="entypo-logout"></i><span>Logout</span></a></li>
</ul>

<script>
    function toggleSubMenu(menuId) {
        var subMenu = document.getElementById(menuId);
        subMenu.style.display = (subMenu.style.display === 'none' || subMenu.style.display === '') ? 'block' : 'none';
    }
</script>
