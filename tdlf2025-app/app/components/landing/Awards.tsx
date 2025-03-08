import Image from "next/image";
import Container from "./Container";

export default function Awards() {
  return (
    <section className="mt-60" id="premios">
      <Container className="pt-12 pb-10 px-6 xs:px-8 bg-gradient-to-b from-primary to-accent shadow-awards rounded-2xl max-w-screen-xl mx-auto">
        <hgroup className="text-center">
          <h3 className="font-bold text-4xl sm:text-5xl lg:text-6xl">
            Premios
          </h3>
          <p className="mt-3 max-w-4xl mx-auto text-base leading-5 xs:leading-8 xs:text-lg md:text-xl">
            Estamos encantados de reconocer a los destacados participantes que
            aportaran pasión, habilidad y deportividad al Torneo de las Fresas.
          </p>
        </hgroup>
        <div className="mt-9 relative grid auto-rows-max md:grid-cols-2 mx-auto max-w-screen-base gap-y-6 gap-x-5">
          <h4 className="col-span-full text-center text-2xl sm:text-3xl font-semibold">
            Categoria Libre
          </h4>
          <article className="relative flex items-center justify-center py-5 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $8,000 para el campeon
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="56"
                height="56"
                viewBox="0 0 64 64"
              >
                <path
                  fill="#dbb471"
                  d="M54 46.9C54 59 44.2 59 32 59s-22 0-22-12.1S19.9 15 32 15s22 19.7 22 31.9"
                />
                <g fill="#89664c">
                  <path
                    d="M54 46.9c0-4.1-1.1-9.1-3.1-13.9c.4 3.1-.4 8.6-9.9 10.7c-13.5 2.9-6.5 6.7-11.8 7.2c-4.5.4-16.5-1.4-18.9-8.2c-.2 1.5-.4 2.9-.4 4.3c.1 12 10 12 22.1 12s22 0 22-12.1"
                    opacity=".5"
                  />
                  <path d="M37.9 41.1c-.4-2-2.1-2.6-3.9-2.7v-2.8c.5.2 1.1.5 1.5.8c.8.5 1.6-.8.8-1.3c-.7-.4-1.5-.8-2.3-1.1v-3.3c0-1-1.5-1-1.5 0v2.9q-1.2-.15-2.4 0c-.1-.7-.3-1.4-.5-2.1c-.2-1-1.7-.6-1.4.4c.2.7.3 1.4.5 2.1c-.1 0-.1 0-.2.1c-2 .8-3.3 2.8-1.8 4.7c.7.9 1.6 1.2 2.6 1.4c.1 1.3.1 2.6.1 3.9c-.7-.4-1.3-1-1.8-1.5c-.7-.7-1.7.4-1.1 1.1c.9 1 1.9 1.7 2.9 2.2c0 1.1.1 2.2.2 3.3c.1 1 1.6 1 1.5 0s-.2-1.9-.2-2.9c.6.1 1.2.1 1.8.1c.1 1 .2 2 .3 3.1c.1 1 1.6 1 1.5 0c-.1-1.1-.2-2.2-.3-3.4c2.2-.8 4.2-2.5 3.7-5m-5.4-6v3.3c-.5 0-.9.1-1.3.1h-.5l-.3-3.6c.7 0 1.4.1 2.1.2m-3.6 3.2c-.4-.1-.8-.4-1.2-.7c-.9-.9.4-1.7 1.2-2.1c.1 1 .2 1.9.3 2.9c-.1 0-.2 0-.3-.1m3.3 6.4c-.5.1-.9 0-1.3-.1c-.1-1.5-.1-3-.1-4.6c.6 0 1.2-.1 1.8-.1c0 1.6.1 3.1.1 4.7c-.2.1-.3.1-.5.1m3.3-1.1c-.4.3-.9.5-1.3.7c-.1-1.5-.1-2.9-.1-4.4h.5c1.9.4 2.4 2.5.9 3.7" />
                </g>
                <path
                  fill="#699635"
                  d="M34 55h-2.3v4l9.3 5l21-6.5V54l-7.7-4.5z"
                />
                <path
                  fill="#83bf4f"
                  d="M32 52.7s2.4 3.9 9.2 7.3c0 0 10.6-.5 20.8-7.3c0 0-5.9-2.9-7.6-6.7c0 0-4 5.6-22.4 6.7"
                />
                <path
                  fill="#699635"
                  d="m27.5 54.9l2.2-.1l.3 3.7l-8.7 5.5L.4 59.5l-.3-3.3l7.1-4.9z"
                />
                <path
                  fill="#83bf4f"
                  d="M29.2 52.6s-2.1 3.9-8.4 7.6c0 0-10.3.3-20.8-5.2c0 0 5.6-3.2 6.9-7c0 0 4.4 5 22.3 4.6"
                />
                <path
                  fill="none"
                  stroke="#699635"
                  strokeMiterlimit="10"
                  d="M24.2 53.7s-.3.8 1.1.9l-3.7 3.1s-2.2-.2-2.7 1.3c0 0-9-1-14.8-3.6c0 0 1.2-.9-.3-1.5c0 0 1.7-1.2 2.1-2.3c0 0 1.6.2 2.1-1c.2-.1 6.2 3.5 16.2 3.1z"
                />
                <ellipse cx="8.8" cy="53.8" fill="#699635" rx="1.9" ry="1.3" />
                <path
                  fill="#f9f3d9"
                  d="M19 52.2s-2.3 3-7.3 7.1L12 62l-3.5-.8l-.2-2.9s5.1-4.7 6.2-7c-.1 0 1.7.6 4.5.9m23.1-.7s.9 2.4 7.7 6.8v2.9l3.9-1.2v-3s-4.7-3.3-7.5-6.6z"
                />
                <path
                  fill="#699635"
                  d="m36.4 48.3l-2.2-.1l-.2 4.1l8.9 5.7l20.9-5.7l.1-3.6l-7.3-5.1z"
                />
                <path
                  fill="#83bf4f"
                  d="M34.6 45.8s2.2 4.2 8.7 8c0 0 10.4 0 20.7-6.4c0 0-5.7-3.3-7.1-7.4c0 0-4.3 5.6-22.3 5.8"
                />
                <path
                  fill="none"
                  stroke="#699635"
                  strokeMiterlimit="10"
                  d="M39.1 46.9s.5.8-1.1 1.1l4.2 3.3s2.4-.6 3.2.8c0 0 10-1.8 14.6-4.2c0 0-1.5-.7 0-1.6c0 0-1.8-1.5-2.5-2.5c0 0-1.7.5-2.6-.7c0 .1-3.6 3.3-15.8 3.8z"
                />
                <path
                  fill="#699635"
                  d="M46.8 49.4c-.4.5-1.7.7-2.8.4s-1.6-1-1.2-1.5s1.7-.7 2.8-.4s1.6.9 1.2 1.5"
                />
                <path
                  fill="#f9f3d9"
                  d="M44.8 45s2.4 3.2 7.5 7.5l-.1 3l3.5-1l.1-3.2s-5.2-5-6.5-7.4c.1 0-1.6.7-4.5 1.1"
                />
                <path
                  fill="#dbb471"
                  d="M46 2c0 6.1-7.9 16-14 16S18 9.1 18 3s.9 0 7 0c.9 0 5.1-3 7-3c1.3 0 5 3 7 3c5.3 0 7-5.6 7-1"
                />
                <path
                  fill="#89664c"
                  d="M30.2 13.3c-.6.4-3.5.1-4.4.8c-1.2.9.5 3-.7 4.3c-2.4 2.4-4.3 5.1-3.7 6.6c1 2.6 2.9-4.8 4.6-2s1.4-1.9 4 .5s.4-4.3 2.9-1.4s2.6 6.2 4.4 6.2c2.1 0-2.2-7.9.6-6s5.9 1.2 3.1-1.7c-.9-.9-2.1-2.5-3.5-3.9c-.5-.5-.1-3.1-.6-3.5c-.6-.5-2.1 1.1-2.7.8c-1.2-.6-.8.5-2.6.8c-1.2.4-.2-2.3-1.4-1.5"
                />
                <path
                  fill="#e8e8e8"
                  d="M18.7 19.2c3.9-3.7 11-1.6 15.2.2c4.1 1.8 6.6-3.9 4-6.8c-1.5-1.7-3.9.3-4.8 1.5c-1 1.2-1.8 2.5-2.9 3.7c-1.6 1.8-5.5.3-4.3-2.2c1.3-2.6 6.8.4 8.6.9c3.5 1 7.2 1.4 10.7.1c1.2-.4.7-2.4-.5-1.9c-3.9 1.4-7.8.5-11.5-.7c-1.9-.6-4.9-2.2-6.9-1.3c-5.7 2.7-.4 10.4 4.4 7.4c1.1-.7 1.8-1.8 2.6-2.8c.5-.6 3-4.4 3.6-2.5c.3 1 0 2.8-1.1 3.1c-.7.3-2.1-.7-2.8-.9c-1.3-.5-2.6-.9-4-1.2c-3.7-.8-8.7-.6-11.6 2.1c-1 .8.4 2.2 1.3 1.3"
                />
                <path
                  fill="#89664c"
                  d="M44.8.5C43.8 1.3 42 3 39 3c-2 0-5.7-3-7-3c-1.9 0-6.1 3-7 3c-3.3 0-5.1-1.7-6-2.4c0 0 1.1 4.5 4.5 6.8C26 9 25.7 7.1 27 5.3s2.2-2.7 4.5 1.8c1.2 2.5 3.5-6.8 5.3-3.8c3.3 5.5 4.5 2.5 8-2.8"
                />
                <path
                  fill="#dbb471"
                  d="m52.4 52.4l-.1 3l3.5-1l.1-3.2c0 .1-2.1.9-3.5 1.2m-2.6 6v2.9l3.9-1.2v-3c-.1-.1-1.1.5-3.9 1.3m-38.1.8L12 62l-3.5-.8l-.2-2.9c-.1 0 1.3.5 3.4.9"
                />
              </svg>
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $4,000 para el subcampeon
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="56"
                height="56"
                viewBox="0 0 36 36"
              >
                <path
                  fill="#FDD888"
                  d="M31.898 23.938C31.3 17.32 28 14 28 14l-6-8h-8l-6 8s-1.419 1.433-2.567 4.275C3.444 18.935 2 20.789 2 23a4.97 4.97 0 0 0 1.609 3.655A4.94 4.94 0 0 0 3 29c0 1.958 1.136 3.636 2.775 4.456C7.058 35.378 8.772 36 10 36h16c1.379 0 3.373-.779 4.678-3.31C32.609 31.999 34 30.17 34 28a4.99 4.99 0 0 0-2.102-4.062M18 6c.55 0 1.058-.158 1.5-.416c.443.258.951.416 1.5.416c1.657 0 4-2.344 4-4c0 0 0-2-2-2c-.788 0-1 1-2 1s-1-1-3-1s-2 1-3 1s-1.211-1-2-1c-2 0-2 2-2 2c0 1.656 2.344 4 4 4c.549 0 1.057-.158 1.5-.416c.443.258.951.416 1.5.416"
                />
                <path
                  fill="#BF6952"
                  d="M24 6a1 1 0 0 1-1 1H13a1 1 0 0 1 0-2h10a1 1 0 0 1 1 1"
                />
                <path
                  fill="#67757F"
                  d="M23.901 24.542c0-4.477-8.581-4.185-8.581-6.886c0-1.308 1.301-1.947 2.811-1.947c2.538 0 2.99 1.569 4.139 1.569c.813 0 1.205-.493 1.205-1.046c0-1.284-2.024-2.256-3.965-2.592V12.4c0-.773-.65-1.4-1.454-1.4c-.805 0-1.456.627-1.456 1.4v1.283c-2.116.463-3.937 1.875-3.937 4.176c0 4.299 8.579 4.125 8.579 7.145c0 1.047-1.178 2.093-3.111 2.093c-2.901 0-3.867-1.889-5.045-1.889c-.574 0-1.087.464-1.087 1.164c0 1.113 1.938 2.451 4.603 2.824l-.001.01v1.398c0 .772.652 1.4 1.456 1.4s1.455-.628 1.455-1.4v-1.398c0-.017-.008-.03-.009-.045c2.398-.43 4.398-1.932 4.398-4.619"
                />
              </svg>
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $2,000 para el tercer lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="56"
                height="56"
                viewBox="0 0 100 100"
              >
                <path
                  fill="#24AE5F"
                  fillRule="evenodd"
                  d="M23.25 79L0 67V32.656L51.75 7L75 19v34.5z"
                  clipRule="evenodd"
                />
                <path
                  fill="#1E9450"
                  fillRule="evenodd"
                  d="M0 64.554v2.983l23.193 11.932l51.622-25.356V51.13L23.193 76.486zm0-5.22v2.983l23.193 11.932l51.622-25.355V45.91L23.193 71.266zm0-10.441v2.983l23.193 11.932l51.622-25.355V35.47L23.193 60.825zm0 5.22v2.983l23.193 11.932l51.622-25.356v-2.983L23.193 66.046zm0-10.44v2.983l23.193 11.932l51.622-25.356V30.25L23.193 55.605zm23.251 1.462L0 33.084v3.013l23.251 12.05L75.003 22.54v-3.013zM0 38.453v2.983l23.251 11.932l51.752-25.356v-2.983L23.251 50.385z"
                  clipRule="evenodd"
                />
                <path
                  fill="#24AE5F"
                  fillRule="evenodd"
                  d="M48.133 91.884L24.998 79.951V50.647l51.495-25.355L100 37.299v29z"
                  clipRule="evenodd"
                />
                <path
                  fill="#1E9450"
                  fillRule="evenodd"
                  d="M25 77.085v2.983L48.25 92L100 66.644v-2.983L48.25 89.017zm0-5.22v2.983L48.25 86.78L100 61.424v-2.983L48.25 83.796zm0-10.441v2.983l23.25 11.932L100 50.983V48L48.25 73.356zm0 5.22v2.983L48.25 81.56L100 56.204v-2.983L48.25 78.576zm0-10.44v2.983l23.25 11.932L100 45.763V42.78L48.25 68.136zm23.25 6.367L25 50.64v2.983l23.25 11.932L100 40.199v-2.983z"
                  clipRule="evenodd"
                />
                <path
                  d="M23.193 45.165L0 33.25v34.344L23.25 79.5zm25 17.435L25 50.685v29.292l23.25 11.906z"
                  opacity=".1"
                />
                <path
                  fill="#1E9450"
                  fillRule="evenodd"
                  d="m59.996 50.609l-11.363 5.459l-9.702-5.22l13.138-6.436s-.912-2.62-.354-3.019c-.01.047-19.386 9.692-19.386 9.692l16.583 8.291l17.048-8.523s-1.669.055-3.148-.006c-1.502-.06-2.816-.238-2.816-.238m13.446-3.496L93.5 37.5l-16.299-8.849l-17.032 8.515c2.582-.133 4.697.978 4.697.978l12.126-5.94l10.448 5.221l-13.99 6.72z"
                  clipRule="evenodd"
                />
                <path
                  fill="#1E9450"
                  d="M64.235 46.958a5.6 5.6 0 0 0 1.99-.302l-3.529-1.87l-.3.078l-.384.123q-.784.236-1.61.433t-1.68.246c-.854.049-1.137-.001-1.702-.101a5.8 5.8 0 0 1-1.693-.597q-.861-.456-1.196-.977t-.25-1.04t.538-1.019a5.1 5.1 0 0 1 1.151-.924l-1.3-.689l.981-.52l1.3.689a11 11 0 0 1 1.734-.57a9.4 9.4 0 0 1 1.831-.255a8.7 8.7 0 0 1 1.887.137a7.6 7.6 0 0 1 1.886.612l-2.361 1.251a3.8 3.8 0 0 0-1.564-.389q-.872-.039-1.437.261l2.989 1.584l.509-.162l.559-.171q1.568-.472 2.731-.562q1.163-.087 2.02.031q.856.12 1.455.374q.599.257 1.021.48q.372.197.754.594q.383.397.449.934q.067.537-.309 1.184q-.377.646-1.538 1.353l1.435.761l-.981.52l-1.435-.761q-1.998.915-4.075.924t-4.237-.959l2.344-1.242a4.3 4.3 0 0 0 2.017.541m3.45-1.229q.215-.23.27-.474a.7.7 0 0 0-.074-.489q-.129-.244-.535-.459a2.6 2.6 0 0 0-1.395-.308q-.737.042-1.988.418l3.242 1.718a2.6 2.6 0 0 0 .48-.406M57.08 42.391a.76.76 0 0 0-.22.394a.55.55 0 0 0 .098.413q.137.206.492.393q.558.296 1.21.272q.653-.024 1.637-.349l-2.753-1.458a1.8 1.8 0 0 0-.464.335"
                />
                <path
                  fill="#1E9450"
                  fillRule="evenodd"
                  d="M34.583 32.609L23.22 38.068l-9.702-5.22l13.138-6.436s-.913-2.62-.354-3.019c-.01.047-19.386 9.692-19.386 9.692l16.583 8.291l17.048-8.523s-1.669.055-3.148-.006c-1.502-.06-2.816-.238-2.816-.238m13.446-3.496L68.087 19.5l-16.299-8.849l-17.032 8.515c2.582-.133 4.697.978 4.697.978l12.126-5.94l10.448 5.221l-13.989 6.72z"
                  clipRule="evenodd"
                />
                <path
                  fill="#1E9450"
                  d="M38.822 28.958a5.6 5.6 0 0 0 1.99-.302l-3.53-1.87l-.3.078l-.384.123a29 29 0 0 1-1.61.433q-.827.197-1.68.246c-.853.049-1.136-.001-1.702-.101a5.8 5.8 0 0 1-1.693-.597q-.861-.456-1.196-.977t-.25-1.04t.538-1.018a5.1 5.1 0 0 1 1.151-.924l-1.3-.689l.981-.52l1.3.689a11 11 0 0 1 1.734-.57a9.4 9.4 0 0 1 1.831-.255a8.7 8.7 0 0 1 1.887.137a7.6 7.6 0 0 1 1.886.612l-2.361 1.251a3.8 3.8 0 0 0-1.564-.389q-.872-.039-1.437.261l2.989 1.584l.509-.163l.559-.171q1.568-.472 2.731-.562q1.163-.088 2.02.031q.856.12 1.455.375q.599.256 1.021.48q.372.197.754.594q.383.397.449.934q.067.537-.309 1.184q-.377.646-1.538 1.353l1.435.761l-.981.52l-1.435-.761q-1.998.915-4.075.924t-4.237-.959l2.344-1.242q.945.517 2.018.54m3.45-1.229q.215-.23.269-.474a.7.7 0 0 0-.074-.489q-.129-.244-.535-.46a2.6 2.6 0 0 0-1.395-.308l-1.988.419l3.242 1.718q.267-.175.481-.406m-10.605-3.338a.76.76 0 0 0-.22.394a.55.55 0 0 0 .098.413q.137.206.492.393q.557.296 1.211.272q.653-.024 1.637-.349l-2.753-1.458a1.8 1.8 0 0 0-.465.335"
                />
              </svg>
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $1,000 para el cuarto lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="56"
                height="56"
                viewBox="0 0 48 48"
              >
                <path
                  fill="#78909C"
                  d="M40 41H8c-2.2 0-4-1.8-4-4V16.1c0-1.3.6-2.5 1.7-3.3L24 0l18.3 12.8c1.1.7 1.7 2 1.7 3.3V37c0 2.2-1.8 4-4 4"
                />
                <path fill="#AED581" d="M14 1h20v31H14z" />
                <g fill="#558B2F">
                  <path d="M13 0v33h22V0zm20 31H15V2h18z" />
                  <path d="M34 3c0 1.7-.3 3-2 3s-3-1.3-3-3s1.3-2 3-2s2 .3 2 2M16 1c1.7 0 3 .3 3 2s-1.3 3-3 3s-2-1.3-2-3s.3-2 2-2" />
                  <circle cx="24" cy="8" r="2" />
                  <circle cx="24" cy="20" r="6" />
                </g>
                <path
                  fill="#CFD8DC"
                  d="M40 41H8c-2.2 0-4-1.8-4-4V17l20 13l20-13v20c0 2.2-1.8 4-4 4"
                />
              </svg>
            </div>
          </article>
          <h4 className="mt-8 col-span-full text-center text-2xl sm:text-3xl font-semibold">
            Categoria 50 y más
          </h4>
          <article className="row-span-2 relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent">
            <span className="absolute w-full text-lg font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2">
              Raqueta Head para el primer lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <Image
                src={"/raqueta.png"}
                width={150}
                height={150}
                alt="Raqueta Head"
                className="max-w-[150px]"
              />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent">
            <span className="absolute w-full text-lg font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2">
              Maletero MasterPro para el segundo lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <Image
                src={"/maletero.webp"}
                width={150}
                height={150}
                alt="Maletero"
                className="max-w-[150px]"
              />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-accent">
            <span className="absolute w-full text-lg font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2">
              Playeras conmemorativas para el tercer lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <Image
                src={"/playeras.png"}
                width={150}
                height={150}
                alt="Raqueta Head"
                className="max-w-[150px]"
              />
            </div>
          </article>
        </div>
      </Container>
    </section>
  );
}
