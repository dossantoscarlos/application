// Generated by nitro

// App Config
import type { Defu } from 'defu'

import type { default as appConfig0 } from "/home/nakiban/application/clientes/web/portal_aluno/app.config";

type UserAppConfig = Defu<{}, [typeof appConfig0]>

declare module 'nitropack' {
  interface AppConfig extends UserAppConfig {}
}
    
export {}