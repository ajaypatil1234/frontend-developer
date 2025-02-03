import { useState } from "react";
import { Home, User, Settings, Menu } from "lucide-react";
import "./home.css";

export default function Sidebar() {
    const [expanded, setExpanded] = useState(false);
    const [hovered, setHovered] = useState(false);

    const toggleSidebar = () => setExpanded(!expanded);

    return (

        <div className="container">
            {/* Sidebar */}
            <div
                className={`sidebar ${expanded || hovered ? "expanded" : "collapsed"}`}
                onMouseEnter={() => setHovered(true)}
                onMouseLeave={() => setHovered(false)}
            >
                {/* Menu Button */}
                <button className="menu-btn" onClick={toggleSidebar}>
                    <Menu className="icon" />
                    {expanded && <span>Menu</span>}
                </button>

                {/* Sidebar Items */}
                <SidebarItem icon={Home} text="Home" expanded={expanded || hovered} />
                <SidebarItem icon={User} text="Profile" expanded={expanded || hovered} />
                <SidebarItem icon={User} text="Profile" expanded={expanded || hovered} />
                <SidebarItem icon={User} text="Profile" expanded={expanded || hovered} />
                <SidebarItem icon={User} text="Profile" expanded={expanded || hovered} />
                <SidebarItem icon={Settings} text="Settings" expanded={expanded || hovered} />
            </div>

            {/* Content Area */}
            <div className="content">Main Content</div>
        </div>
    );
}

function SidebarItem({ icon: Icon, text, expanded }) {
    return (
        <div className="sidebar-item">
            <Icon className="icon" />
            {expanded && <span>{text}</span>}
        </div>
    );
}