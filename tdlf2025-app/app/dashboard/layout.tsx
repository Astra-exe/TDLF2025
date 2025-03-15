import { SidebarProvider, SidebarTrigger } from "@/app/components/ui/sidebar";
import AppSideNav from "@/app/components/AppSideNav";
import { Toaster } from "@/app/components/ui/sonner";

export default function DashBoardLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <div>
      <SidebarProvider>
        <AppSideNav />
        <main className="w-full">
          <SidebarTrigger />
          {children}
        </main>
      </SidebarProvider>
      <Toaster />
    </div>
  );
}
