import { logOut } from "@/app/lib/actions";

export default function DashboardPage() {
  return (
    <div>
      <div>
        <h1>Dashboard</h1>
        <form action={logOut}>
          <button className="flex h-[48px] grow items-center justify-center gap-2 rounded-md bg-gray-50 text-dark p-3 text-sm font-medium hover:bg-sky-100 hover:text-blue-600 md:flex-none md:justify-start md:p-2 md:px-3">
            <div className="hidden md:block">Sign Out</div>
          </button>
        </form>
      </div>
    </div>
  );
}
