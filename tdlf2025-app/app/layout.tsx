import type { Metadata } from "next";
import { Space_Grotesk, Nosifer } from "next/font/google";
import "./globals.css";

const spaceGrotesk = Space_Grotesk({
  variable: "--font-space-grotesk",
  subsets: ["latin"],
});

const nosifer = Nosifer({
  variable: "--font-nosifer",
  subsets: ["latin"],
  weight: ["400"],
});

export const metadata: Metadata = {
  title: "Torneo de las Fresas - 2025",
  description:
    "¡Participa en el Torneo de Frontenis de las Fresas 2025 en Irapuato! Promovemos el deporte y la competencia entre nuevas generaciones. ¡Descubre más sobre el evento y únete a la emoción!",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="es">
      <body
        className={`${nosifer.variable}
        ${spaceGrotesk.variable} antialiased`}
      >
        {children}
      </body>
    </html>
  );
}
