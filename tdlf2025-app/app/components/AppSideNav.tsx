import {
  Sidebar,
  SidebarContent,
  SidebarGroup,
  SidebarGroupContent,
  SidebarGroupLabel,
  SidebarMenu,
  SidebarMenuItem,
  SidebarMenuButton,
  SidebarHeader,
  SidebarFooter,
} from "@/app/components/ui/sidebar";
import {
  Home,
  ClipboardPen,
  UsersRound,
  Boxes,
  Group,
  LogOut,
} from "lucide-react";
import { logOut } from "@/app/lib/actions";

// Menu items.
const items = [
  {
    title: "Home",
    url: "/dashboard",
    icon: Home,
  },
  {
    title: "Inscripción",
    url: "/dashboard/inscripcion",
    icon: ClipboardPen,
  },
  {
    title: "Parejas",
    url: "/dashboard/parejas",
    icon: UsersRound,
  },
  {
    title: "Grupos",
    url: "/dashboard/grupos",
    icon: Boxes,
  },
  {
    title: "Partidos",
    url: "/dashboard/partidos",
    icon: Group,
  },
];

export default function AppSideNav() {
  return (
    <Sidebar>
      {/* Header */}
      <SidebarHeader>
        <SidebarGroupLabel>Dashboard - TDLF2025</SidebarGroupLabel>
      </SidebarHeader>
      {/* Content */}
      <SidebarContent>
        <SidebarGroup>
          <SidebarGroupContent>
            <SidebarMenu>
              {items.map((item) => (
                <SidebarMenuItem key={item.title}>
                  <SidebarMenuButton asChild>
                    <a href={item.url}>
                      <item.icon />
                      <span>{item.title}</span>
                    </a>
                  </SidebarMenuButton>
                </SidebarMenuItem>
              ))}
            </SidebarMenu>
          </SidebarGroupContent>
        </SidebarGroup>
      </SidebarContent>
      {/* Footer */}
      <SidebarFooter>
        <form action={logOut}>
          <SidebarMenuButton className="flex justify-end cursor-pointer">
            <LogOut />
            <span>Sign Out</span>
          </SidebarMenuButton>
        </form>
      </SidebarFooter>
    </Sidebar>
  );
}
