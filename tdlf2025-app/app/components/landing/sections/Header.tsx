import styles from "@/app/styles/landing.module.css";

const navLinks = [
  {
    text: "Reglas",
    href: "#reglas",
  },
  {
    text: "Agenda",
    href: "#agenda",
  },
  {
    text: "Patrocinadores",
    href: "#patrocinadores",
  },
  {
    text: "Premios",
    href: "#premios",
  },
];

export default function Header() {
  return (
    <header
      className={`${styles.scroll__animate} sticky z-50 py-5 top-4 animate-scroll-header`}
    >
      <nav className="w-fit mx-auto hidden sm:block">
        <ul className="px-10 py-5 flex justify-center gap-x-12 border border-white rounded-full">
          {navLinks.map((navLink) => {
            return (
              <li
                key={navLink.href}
                className="font-bold lg:text-lg text-white opacity-75 hover:opacity-100 hover:drop-shadow-custom transition-opacity"
              >
                <a href={navLink.href} className="">
                  {navLink.text}
                </a>
              </li>
            );
          })}
        </ul>
      </nav>
    </header>
  );
}
