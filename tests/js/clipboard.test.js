import { describe, it, expect, vi } from 'vitest'

describe('Clipboard Plugin', () => {
  it('can mock clipboard', () => {
    const writeText = vi.fn().mockResolvedValue(true)
    Object.defineProperty(navigator, 'clipboard', {
      value: { writeText },
      configurable: true
    })
    
    navigator.clipboard.writeText('hello')
    expect(writeText).toHaveBeenCalledWith('hello')
  })
})
